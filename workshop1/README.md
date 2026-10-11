# Workshop 1 – Training Institute (Students + Courses CRUD)

This is the complete `workshop1` Laravel 13 project with all Workshop 1 code
already added. `vendor/` and `node_modules/` are not included (they are huge and
get downloaded on your machine), so you need to run the first-time setup below.

## First-time setup (run in the WSL terminal)

1. Copy this folder into your Linux home so it is at `~/workshop1`.
2. Install PHP packages:

       cd ~/workshop1
       composer install

3. The app key is already set in `.env` (no key:generate needed).

4. The `.env` database lines are already set for samujwal:

       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=WorkshopDB
       DB_USERNAME=samujwal
       DB_PASSWORD=samujwal

5. In DBeaver run `CREATE DATABASE WorkshopDB;`
6. Create the tables:

       php artisan migrate

7. Start the server:

       php artisan serve

8. Open http://127.0.0.1:8000/students and http://127.0.0.1:8000/courses

Do NOT run `php artisan make:model Student -m` or `make:model Course -m`;
the models and migrations are already here.

## Workshop 1 files (the ones added/changed)

| File | What it is |
|---|---|
| app/Models/Student.php | Student model ($fillable) |
| app/Models/Course.php | Course model ($fillable + is_active cast to boolean) |
| database/migrations/2026_10_04_000001_create_students_table.php | students table |
| database/migrations/2026_10_04_000002_create_courses_table.php | courses table |
| routes/web.php | All Student + Course routes |
| resources/views/student/*.blade.php | list, create, detail, edit pages for students |
| resources/views/course/*.blade.php | list, create, detail, edit pages for courses |
| .env / .env.example | set to MySQL + WorkshopDB |

## Small fixes compared to the workshop draft

1. Routes use `/students` everywhere. The draft mixed `/student/create` and
   `/students/create`, so the links would 404.
2. `/students/create` is defined BEFORE `/students/{id}`. Otherwise Laravel
   treats the word "create" as an id.
3. The list route has `->name('students.index')`, because the POST route uses
   `redirect()->route('students.index')`.
4. `use Illuminate\Validation\Rule;` is imported (needed for the edit route).
5. Create validation has `unique:students,email`, so a duplicate email shows a
   nice error instead of a database crash.
6. The branch name: the draft uses `Workshop1` in one place and `workshop1` in
   another. Git branch names are case-sensitive, so use whatever your GitHub
   guideline says, consistently.

## Course table design

| Field | Column | Validation |
|---|---|---|
| name | string | required, max 255 |
| description | text, nullable | nullable, max 1000 |
| duration | integer (weeks) | required, integer, min 1 |
| fee | decimal(10,2) | required, numeric, min 0 |
| difficulty | enum Easy/Medium/Hard | required, in:Easy,Medium,Hard |
| is_active | boolean, default true | required, boolean |

The is_active checkbox uses a hidden input with value 0 before the checkbox.
An unticked checkbox sends nothing, so the hidden input makes sure 0 is sent.

## Answers to the "Things to understand" questions

**What does `old('name')` do?**
When validation fails, Laravel redirects back to the form. `old('name')` puts
back what the user typed so they don't have to retype everything. In the edit
form, `old('name', $student->name)` means "use what they typed, otherwise use
the value from the database".

**Why is POST used in the form?**
GET puts data in the URL and is for reading. POST sends data in the request
body and is for creating/changing data on the server.

**`Request $request`, `$request->input()`, `Student::create()`**
`$request` is the incoming HTTP request. `$request->input([...])` reads the form
fields. `Student::create($data)` runs an SQL INSERT into the students table.

**Where does `session('success')` come from?**
From `redirect()->with('success', '...')` in the route. The message is "flashed"
into the session for exactly one more request, shown once, then deleted.

**Where does `$students` come from in the list view?**
The route runs `Student::all()` and passes it with
`view('student.list', ['students' => $students])`.

**`@forelse`, `@empty`, `@endforelse`**
Like a foreach loop, but if the list is empty it shows the `@empty` part
("No students found.") instead.

**`{{ $student->name }}`**
Prints the value, escaped for HTML, so someone typing `<script>` can't break
or hack the page.

**`@csrf`**
Adds a hidden secret token to the form. Laravel rejects POST/PUT/DELETE requests
without it (error 419). It stops other websites from submitting forms as you.

**`@method('PUT')` / `@method('DELETE')`**
HTML forms only support GET and POST. This adds a hidden `_method` field, so the
browser sends POST but Laravel treats it as PUT or DELETE (method spoofing).

**`findOrFail($id)`**
Finds the record by id. If it doesn't exist, Laravel shows a 404 page.

**`Rule::unique('students')->ignore($student->id)`**
When editing, the student's own email already exists in the table. This tells
Laravel to skip the current student when checking for duplicates.

## Pages to test (after `php artisan serve`)

- http://127.0.0.1:8000/students
- http://127.0.0.1:8000/students/create
- http://127.0.0.1:8000/courses
- http://127.0.0.1:8000/courses/create
