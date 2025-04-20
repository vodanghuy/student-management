package com.example.studentmanagement;

import com.example.studentmanagement.models.Subject;
import com.example.studentmanagement.services.SubjectService;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;

@RestController
@RequestMapping("/subjects")
public class SubjectResource {
    private final SubjectService subjectService;

    public SubjectResource(SubjectService subjectService) {
        this.subjectService = subjectService;
    }

    @GetMapping()
    public ResponseEntity<List<Subject>> getSubjects(){
        List<Subject> subjects = subjectService.getSubjects();
        return new ResponseEntity<>(subjects, HttpStatus.OK);
    }

    @GetMapping("/{id}")
    public ResponseEntity<Subject> getSubjectById(@PathVariable("id") String id){
        Subject subject = subjectService.getSubjectById(id);
        return new ResponseEntity<>(subject, HttpStatus.OK);
    }

    @PostMapping()
    public ResponseEntity<Subject> createSubject(@RequestBody Subject subject){
        Subject newSubject = subjectService.createSubject(subject);
        return new ResponseEntity<>(newSubject, HttpStatus.CREATED);
    }

    @PutMapping()
    public ResponseEntity<Subject> updateSubject(@RequestBody Subject subject){
        Subject updateSubject = subjectService.updateSubject(subject);
        return new ResponseEntity<>(updateSubject, HttpStatus.CREATED);
    }

    @DeleteMapping("/{id}")
    public ResponseEntity<?> deleteSubject(@PathVariable("id") String id){
        subjectService.deleteSubject(id);
        return new ResponseEntity<>(HttpStatus.OK);
    }
}
