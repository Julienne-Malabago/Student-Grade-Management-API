<?php
class StudentServices {
    public function calculateFinalGrade($midterm_score, $finals_score) {
        $final_grade = ($midterm_score * 0.5) + ($finals_score * 0.5);
        $status = $final_grade >= 75 ? 'Passed' : 'Failed';
        return [$final_grade, $status];
    }
}
?>