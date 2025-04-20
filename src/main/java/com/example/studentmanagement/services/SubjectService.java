package com.example.studentmanagement.services;

import com.example.studentmanagement.models.Subject;
import com.example.studentmanagement.repositories.SubjectRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class SubjectService {
    private final SubjectRepository subjectRepository;
    @Autowired
    public SubjectService(SubjectRepository subjectRepository) {
        this.subjectRepository = subjectRepository;
    }

    public List<Subject> getSubjects(){
        return subjectRepository.findAll();
    }

    public Subject getSubjectById(String id){
        return subjectRepository.findById(id).orElseThrow();
    }

    public Subject createSubject(Subject subject){
        return subjectRepository.save(subject);
    }

    public Subject updateSubject(Subject subject){
        return subjectRepository.save(subject);
    }

    public void deleteSubject(String id){
        subjectRepository.deleteById(id);
    }
}
