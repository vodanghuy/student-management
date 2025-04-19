package com.example.studentmanagement.services;

import com.example.studentmanagement.models.Student;
import com.example.studentmanagement.repositories.ClassRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;

@Service
public class ClassService {
    private ClassRepository classRepository;

    @Autowired
    public ClassService(ClassRepository classRepository) {
        this.classRepository = classRepository;
    }
    public List<Class> getAllClasses(){
        return classRepository.findAll();
    }

    public Optional<Class> getClassById(String id){
        return classRepository.findById(id);
    }

    public Class createClass(Class i){
        return classRepository.save(i);
    }

    public Class updateClass(Class i){
        return classRepository.save(i);
    }
    public void deleteClass(String id){
        classRepository.deleteById(id);
    }
}
