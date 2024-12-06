<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "universitydb";

    // Створення з'єднання
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("З'єднання не вдалось: " . $conn->connect_error);
    }
    return $conn;
}

// Функції для таблиці `students`
function insertStudent($name, $group_name) {
    $conn = connectDB();
    $sql = "INSERT INTO students (name, group_name) VALUES ('$name', '$group_name')";
    if ($conn->query($sql) === TRUE) {
        echo "Новий студент доданий успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function deleteStudent($id) {
    $conn = connectDB();
    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Студента видалено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function updateStudent($id, $name, $group_name) {
    $conn = connectDB();
    $sql = "UPDATE students SET name='$name', group_name='$group_name' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Студента оновлено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function searchStudents($name) {
    $conn = connectDB();
    $sql = "SELECT * FROM students WHERE name LIKE '%$name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Group: " . $row["group_name"]. "<br>";
        }
    } else {
        echo "0 результатів";
    }
    $conn->close();
}

// Функції для таблиці `courses`
function insertCourse($title, $professor_id) {
    $conn = connectDB();
    $sql = "INSERT INTO courses (title, professor_id) VALUES ('$title', '$professor_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Новий курс створено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function deleteCourse($id) {
    $conn = connectDB();
    $sql = "DELETE FROM courses WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Курс видалено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function updateCourse($id, $title, $professor_id) {
    $conn = connectDB();
    $sql = "UPDATE courses SET title='$title', professor_id='$professor_id' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Курс оновлено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function searchCourses($title) {
    $conn = connectDB();
    $sql = "SELECT * FROM courses WHERE title LIKE '%$title%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Title: " . $row["title"]. " - Professor ID: " . $row["professor_id"]. "<br>";
        }
    } else {
        echo "0 результатів";
    }
    $conn->close();
}

// Функції для таблиці `professors`
function insertProfessor($name, $department) {
    $conn = connectDB();
    $sql = "INSERT INTO professors (name, department) VALUES ('$name', '$department')";
    if ($conn->query($sql) === TRUE) {
        echo "Новий професор доданий успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function deleteProfessor($id) {
    $conn = connectDB();
    $sql = "DELETE FROM professors WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Професора видалено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function updateProfessor($id, $name, $department) {
    $conn = connectDB();
    $sql = "UPDATE professors SET name='$name', department='$department' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Професора оновлено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function searchProfessors($name) {
    $conn = connectDB();
    $sql = "SELECT * FROM professors WHERE name LIKE '%$name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Department: " . $row["department"]. "<br>";
        }
    } else {
        echo "0 результатів";
    }
    $conn->close();
}

// Функції для таблиці `rooms`
function insertRoom($room_number, $capacity) {
    $conn = connectDB();
    $sql = "INSERT INTO rooms (room_number, capacity) VALUES ('$room_number', '$capacity')";
    if ($conn->query($sql) === TRUE) {
        echo "Нова кімната додана успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function deleteRoom($id) {
    $conn = connectDB();
    $sql = "DELETE FROM rooms WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Кімнату видалено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function updateRoom($id, $room_number, $capacity) {
    $conn = connectDB();
    $sql = "UPDATE rooms SET room_number='$room_number', capacity='$capacity' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Кімнату оновлено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function searchRooms($room_number) {
    $conn = connectDB();
    $sql = "SELECT * FROM rooms WHERE room_number LIKE '%$room_number%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Room Number: " . $row["room_number"]. " - Capacity: " . $row["capacity"]. "<br>";
        }
    } else {
        echo "0 результатів";
    }
    $conn->close();
}

// Функції для таблиці `schedule`
function insertSchedule($course_id, $room_id, $lesson_date) {
    $conn = connectDB();
    $sql = "INSERT INTO schedule (course_id, room_id, lesson_date) VALUES ('$course_id', '$room_id', '$lesson_date')";
    if ($conn->query($sql) === TRUE) {
        echo "Новий запис у розкладі додано успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function deleteSchedule($id) {
    $conn = connectDB();
    $sql = "DELETE FROM schedule WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Запис у розкладі видалено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function updateSchedule($id, $course_id, $room_id, $lesson_date) {
    $conn = connectDB();
    $sql = "UPDATE schedule SET course_id='$course_id', room_id='$room_id', lesson_date='$lesson_date' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Запис у розкладі оновлено успішно";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function searchSchedule($course_id) {
    $conn = connectDB();
    $sql = "SELECT * FROM schedule WHERE course_id LIKE '%$course_id%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Course ID: " . $row["course_id"]. " - Room ID: " . $row["room_id"]. " - Lesson Date: " . $row["lesson_date"]. "<br>";
        }
    } else {
        echo "0 результатів";
    }
    $conn->close();
}
?>
