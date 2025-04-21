package com.example.studentmanagement.services;

import com.example.studentmanagement.models.Student;
import com.example.studentmanagement.models.Subject;
import com.example.studentmanagement.repositories.StudentRepository;
import com.example.studentmanagement.repositories.SubjectRepository;
import jakarta.transaction.Transactional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.Set;

@Service
public class StudentService {
    private final StudentRepository studentRepository;
    private final SubjectRepository subjectRepository;

    @Autowired
    public StudentService(StudentRepository studentRepository, SubjectRepository subjectRepository) {
        this.studentRepository = studentRepository;
        this.subjectRepository = subjectRepository;
    }


    public List<Student> getAllStudents(){
        return studentRepository.findAll();
    }

    public Optional<Student> getStudentById(Long id){
        return studentRepository.findById(id);
    }

    public Student createStudent(Student student){
        return studentRepository.save(student);
    }

    public Student updateStudent(Student student){
        return studentRepository.save(student);
    }
    public void deleteStudent(Long id){
        studentRepository.deleteById(id);
    }

    // Get subjects
    public Set<Subject> getSubjects(Long studentId){
        Student student = studentRepository.findById(studentId)
                .orElseThrow(() -> new RuntimeException(("Student not found with id: "+ studentId)));
        return student.getSubjects();
    }
    // Add subject to student
    @Transactional
    public Student addSubjectToStudent(Long studentId, String subjectId){
        Student student = studentRepository.findById(studentId)
                .orElseThrow(() -> new RuntimeException(("Student not found with id: "+ studentId)));
        Subject subject = subjectRepository.findById(subjectId)
                .orElseThrow(() -> new RuntimeException(("Subject not found with id: "+ subjectId)));
        for(Subject s : student.getSubjects()){
            if(s.getId().equals(subjectId)){
                throw new RuntimeException("Subjects existed");
            }
        }
        student.getSubjects().add(subject);
        subject.setAvailableSlot(subject.getAvailableSlot()-1);
        subjectRepository.save(subject);
        return studentRepository.save(student);
    }

    //Remove subject from student
    @Transactional
    public Student removeSubjectFromStudent(Long studentId, String subjectId){
        Student student = studentRepository.findById(studentId)
                .orElseThrow(() -> new RuntimeException(("Student not found with id: "+ studentId)));
        Subject subject = subjectRepository.findById(subjectId)
                .orElseThrow(() -> new RuntimeException(("Subject not found with id: "+ subjectId)));
        student.getSubjects().remove(subject);
        return studentRepository.save(student);
    }
}
