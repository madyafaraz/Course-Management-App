<?php
function get_courses() {
    global $db;
    $query = 'SELECT * FROM sk_courses
              ORDER BY courseID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_firstcourse() {
    global $db;
    $query = 'SELECT courseID FROM sk_courses ORDER BY courseID ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $courselist = $statement->fetch();
    $statement->closeCursor();    
    $course_id = $courselist['courseID'];
    return $course_id;
     
}


function get_course_name($course_id) {
    global $db;
    $query = 'SELECT * FROM sk_courses
              WHERE courseID = :course_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();    
    $course = $statement->fetch();
    $statement->closeCursor();    
    $course_name = $course['courseName'];
    return $course_name;
}
?>