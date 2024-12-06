<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['insertStudent'])) {
        insertStudent($_POST['name'], $_POST['group_name']);
    } elseif (isset($_POST['deleteStudent'])) {
        deleteStudent($_POST['id']);
    } elseif (isset($_POST['updateStudent'])) {
        updateStudent($_POST['id'], $_POST['name'], $_POST['group_name']);
    } elseif (isset($_POST['searchStudent'])) {
        searchStudents($_POST['name']);
    } elseif (isset($_POST['insertCourse'])) {
        insertCourse($_POST['title'], $_POST['professor_id']);
    } elseif (isset($_POST['deleteCourse'])) {
        deleteCourse($_POST['id']);
    } elseif (isset($_POST['updateCourse'])) {
        updateCourse($_POST['id'], $_POST['title'], $_POST['professor_id']);
    } elseif (isset($_POST['searchCourse'])) {
        searchCourses($_POST['title']);
    } elseif (isset($_POST['insertProfessor'])) {
        insertProfessor($_POST['name'], $_POST['department']);
    } elseif (isset($_POST['deleteProfessor'])) {
        deleteProfessor($_POST['id']);
    } elseif (isset($_POST['updateProfessor'])) {
        updateProfessor($_POST['id'], $_POST['name'], $_POST['department']);
    } elseif (isset($_POST['searchProfessor'])) {
        searchProfessors($_POST['name']);
    } elseif (isset($_POST['insertRoom'])) {
        insertRoom($_POST['room_number'], $_POST['capacity']);
    } elseif (isset($_POST['deleteRoom'])) {
        deleteRoom($_POST['id']);
    } elseif (isset($_POST['updateRoom'])) {
        updateRoom($_POST['id'], $_POST['room_number'], $_POST['capacity']);
    } elseif (isset($_POST['searchRoom'])) {
        searchRooms($_POST['room_number']);
    } elseif (isset($_POST['insertSchedule'])) {
        insertSchedule($_POST['course_id'], $_POST['room_id'], $_POST['lesson_date']);
    } elseif (isset($_POST['deleteSchedule'])) {
        deleteSchedule($_POST['id']);
    } elseif (isset($_POST['updateSchedule'])) {
        updateSchedule($_POST['id'], $_POST['course_id'], $_POST['room_id'], $_POST['lesson_date']);
    } elseif (isset($_POST['searchSchedule'])) {
        searchSchedule($_POST['course_id']);
    }
}

function displayTable($query) {
    $conn = connectDB();
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr>";
        while ($field = $result->fetch_field()) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $cell) {
                echo "<td>" . $cell . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 результатів";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Керування університетом</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Керування університетом</h1>

    <h2>Студенти</h2>
    <form method="post">
        <h3>Вставка студента</h3>
        Ім'я: <input type="text" name="name">
        Група: <input type="text" name="group_name">
        <input type="submit" name="insertStudent" value="Вставити">
    </form>

    <form method="post">
        <h3>Видалення студента</h3>
        ID: <input type="text" name="id">
        <input type="submit" name="deleteStudent" value="Видалити">
    </form>

    <form method="post">
        <h3>Оновлення інформації про студента</h3>
        ID: <input type="text" name="id">
        Нове ім'я: <input type="text" name="name">
        Нова група: <input type="text" name="group_name">
        <input type="submit" name="updateStudent" value="Оновити">
    </form>

    <form method="post">
        <h3>Пошук студентів</h3>
        Ім'я: <input type="text" name="name">
        <input type="submit" name="searchStudent" value="Пошук">
    </form>

    <h3>Дані таблиці студентів</h3>
    <?php displayTable("SELECT * FROM students"); ?>

    <h2>Курси</h2>
    <form method="post">
        <h3>Вставка курсу</h3>
        Назва: <input type="text" name="title">
        Professor ID: <input type="text" name="professor_id">
        <input type="submit" name="insertCourse" value="Вставити">
    </form>

    <form method="post">
        <h3>Видалення курсу</h3>
        ID: <input type="text" name="id">
        <input type="submit" name="deleteCourse" value="Видалити">
    </form>

    <form method="post">
        <h3>Оновлення інформації про курс</h3>
        ID: <input type="text" name="id">
        Нова назва: <input type="text" name="title">
        Новий Professor ID: <input type="text" name="professor_id">
        <input type="submit" name="updateCourse" value="Оновити">
    </form>

    <form method="post">
        <h3>Пошук курсів</h3>
        Назва: <input type="text" name="title">
        <input type="submit" name="searchCourse" value="Пошук">
    </form>

    <h3>Дані таблиці курсів</h3>
    <?php displayTable("SELECT * FROM courses"); ?>

    <h2>Професори</h2>
    <form method="post">
        <h3>Вставка професора</h3>
        Ім'я: <input type="text" name="name">
        Кафедра: <input type="text" name="department">
        <input type="submit" name="insertProfessor" value="Вставити">
    </form>

    <form method="post">
        <h3>Видалення професора</h3>
        ID: <input type="text" name="id">
        <input type="submit" name="deleteProfessor" value="Видалити">
    </form>

    <form method="post">
        <h3>Оновлення інформації про професора</h3>
        ID: <input type="text" name="id">
        Нове ім'я: <input type="text" name="name">
        Нова кафедра: <input type="text" name="department">
        <input type="submit" name="updateProfessor" value="Оновити">
    </form>

    <form method="post">
        <h3>Пошук професорів</h3>
        Ім'я: <input type="text" name="name">
        <input type="submit" name="searchProfessor" value="Пошук">
    </form>

    <h3>Дані таблиці професорів</h3>
    <?php displayTable("SELECT * FROM professors"); ?>

    <h2>Кімнати</h2>
    <form method="post">
        <h3>Вставка кімнати</h3>
        Номер кімнати: <input type="text" name="room_number">
        Місткість: <input type="text" name="capacity">
        <input type="submit" name="insertRoom" value="Вставити">
    </form>

    <form method="post">
        <h3>Видалення кімнати</h3>
        ID: <input type="text" name="id">
        <input type="submit" name="deleteRoom" value="Видалити">
    </form>

    <form method="post">
        <h3>Оновлення інформації про кімнату</h3>
        ID: <input type="text" name="id">
        Новий номер кімнати: <input type="text" name="room_number">
        Нова місткість: <input type="text" name="capacity">
        <input type="submit" name="updateRoom" value="Оновити">
    </form>

    <form method="post">
        <h3>Пошук кімнат</h3>
        Номер кімнати: <input type="text" name="room_number">
        <input type="submit" name="searchRoom" value="Пошук">
    </form>

    <h3>Дані таблиці кімнат</h3>
    <?php displayTable("SELECT * FROM rooms"); ?>

    <h2>Розклад</h2>
    <form method="post">
        <h3>Вставка запису в розклад</h3>
        ID курсу: <input type="text" name="course_id">
        ID кімнати: <input type="text" name="room_id">
        Дата уроку: <input type="date" name="lesson_date">
        <input type="submit" name="insertSchedule" value="Вставити">
    </form>

    <form method="post">
        <h3>Видалення запису з розкладу</h3>
        ID: <input type="text" name="id">
        <input type="submit" name="deleteSchedule" value="Видалити">
    </form>

    <form method="post">
        <h3>Оновлення запису в розкладі</h3>
        ID: <input type="text" name="id">
        Новий ID курсу: <input type="text" name="course_id">
        Новий ID кімнати: <input type="text" name="room_id">
        Нова дата уроку: <input type="date" name="lesson_date">
        <input type="submit" name="updateSchedule" value="Оновити">
    </form>

    <form method="post">
        <h3>Пошук записів у розкладі</h3>
        ID курсу: <input type="text" name="course_id">
        <input type="submit" name="searchSchedule" value="Пошук">
    </form>

    <h3>Дані таблиці розкладу</h3>
    <?php displayTable("SELECT * FROM schedule"); ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchStudent'])) {
        searchStudents($_POST['name']);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchCourse'])) {
        searchCourses($_POST['title']);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchProfessor'])) {
        searchProfessors($_POST['name']);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchRoom'])) {
        searchRooms($_POST['room_number']);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchSchedule'])) {
        searchSchedule($_POST['course_id']);
    }
    ?>
</body>
</html>
