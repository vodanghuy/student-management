package com.example.studentmanagement.repositories;

import com.example.studentmanagement.models.Subject;
import org.springframework.data.jpa.repository.JpaRepository;

public interface SubjectRepository extends JpaRepository<Subject, String> {
}
