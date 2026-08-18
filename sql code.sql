-- ==============================
-- DATABASE
-- ==============================
DROP DATABASE IF EXISTS student_management_portal;
CREATE DATABASE student_management_portal;
USE student_management_portal;

-- ==============================
-- USERS TABLE (Manual user_id)
-- ==============================
CREATE TABLE users (
    user_id INT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') NOT NULL
);

-- ==============================
-- STUDENTS TABLE
-- ==============================
CREATE TABLE students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50),
    semester INT,
    current_cgpa DECIMAL(3,2),

    FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ==============================
-- TEACHERS TABLE
-- ==============================
CREATE TABLE teachers (
    teacher_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50),

    FOREIGN KEY (user_id) REFERENCES users(user_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ==============================
-- COURSES TABLE
-- ==============================
CREATE TABLE courses (
    course_id INT PRIMARY KEY AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL,
    credit_hours INT,
    teacher_id INT,

    FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- ==============================
-- ENROLLMENTS TABLE
-- ==============================
CREATE TABLE enrollments (
    enrollment_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enroll_date DATE,

    FOREIGN KEY (student_id) REFERENCES students(student_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (course_id) REFERENCES courses(course_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    UNIQUE (student_id, course_id)
);

-- ==============================
-- ATTENDANCE TABLE
-- ==============================
CREATE TABLE attendance (
    attendance_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    date DATE,
    status ENUM('Present', 'Absent'),

    FOREIGN KEY (student_id) REFERENCES students(student_id)
        ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
        ON DELETE CASCADE
);

-- ==============================
-- GRADE BOOK TABLE
-- ==============================
CREATE TABLE grade_book (
    gradebook_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    course_id INT NOT NULL,

    quiz_marks INT DEFAULT 0,
    assignment_marks INT DEFAULT 0,
    mid_marks INT DEFAULT 0,
    final_marks INT DEFAULT 0,

    total_marks INT,
    grade CHAR(2),

    FOREIGN KEY (student_id) REFERENCES students(student_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (course_id) REFERENCES courses(course_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    UNIQUE (student_id, course_id)
);

