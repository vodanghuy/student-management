package com.example.studentmanagement;

import com.example.studentmanagement.models.Student;
import com.example.studentmanagement.models.Subject;
import com.example.studentmanagement.repositories.StudentRepository;
import com.example.studentmanagement.services.StudentService;
import org.springframework.http.HttpCookie;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;
import java.util.Set;

@RestController
@RequestMapping("/students")
public class StudentResource {
    private final StudentService studentService;

    public StudentResource(StudentService studentService) {
        this.studentService = studentService;
    }
    @GetMapping()
    public ResponseEntity<List<Student>> getAllStudents(){
        List<Student> students = studentService.getAllStudents();
        return new ResponseEntity<>(students, HttpStatus.OK);
    }
    @GetMapping("/{id}")
    public ResponseEntity<Optional<Student>> getStudentById(@PathVariable("id") Long id){
        Optional<Student> student = studentService.getStudentById(id);
        return new ResponseEntity<>(student, HttpStatus.OK);
    }
    @PostMapping()
    public ResponseEntity<?> createStudent(@RequestBody Student student){
        Student newStudent = studentService.createStudent(student);
        return new ResponseEntity<>(newStudent, HttpStatus.CREATED);
    }
    @PutMapping()
    public ResponseEntity<Student> updateStudent(@RequestBody Student student){
         Student updatedStudent = studentService.updateStudent(student);
         return new ResponseEntity<>(updatedStudent,HttpStatus.OK);
    }
    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteStudent(@PathVariable("id") Long id){
        studentService.deleteStudent(id);
        return new ResponseEntity<>(HttpStatus.OK);
    }
    // Add subject to student
    @PostMapping("/{studentId}/subjects/{subjectId}")
    public ResponseEntity<Student> addSubjectToStudent(@PathVariable("studentId") Long studentId,
                                                       @PathVariable("subjectId") String subjectId){
        Student student = studentService.addSubjectToStudent(studentId,subjectId);
        return new ResponseEntity<>(student, HttpStatus.OK);
    }
    // Remove subject from student
    @DeleteMapping("/{studentId}/subjects/{subjectId}")
    public ResponseEntity<Student> removeSubjectFromStudent(@PathVariable("studentId") Long studentId,
                                                       @PathVariable("subjectId") String subjectId){
        Student student = studentService.removeSubjectFromStudent(studentId,subjectId);
        return new ResponseEntity<>(student, HttpStatus.OK);
    }

    // Get subjects
    @GetMapping("/{studentId}/subjects")
    public ResponseEntity<Set<Subject>> getSubjects(@PathVariable("studentId") Long studentId){
        Set<Subject> subjects = studentService.getSubjects(studentId);
        return new ResponseEntity<>(subjects,HttpStatus.OK);
    }
}
