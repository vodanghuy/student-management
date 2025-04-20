package com.example.studentmanagement.models;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.HashSet;
import java.util.Set;

@Entity
@Table(name="subjects")
public class Subject implements Serializable {
    @Id
    @Column(nullable = false)
    private String id;
    @Column(nullable = false)
    private String name;
    @Column(nullable = false)
    private Integer credit;
    @Column(nullable = false)
    private Integer availableSlot;
    @ManyToMany(mappedBy = "subjects")
    private Set<Student> students = new HashSet<>();
    public Subject() {
    }

    public Subject(String id, String name, Integer credit, Integer availableSlot) {
        this.id = id;
        this.name = name;
        this.credit = credit;
        this.availableSlot = availableSlot;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Integer getCredit() {
        return credit;
    }

    public void setCredit(Integer credit) {
        this.credit = credit;
    }

    @Override
    public String toString() {
        return "Subject{" +
                "id='" + id + '\'' +
                ", name='" + name + '\'' +
                ", credit=" + credit +
                '}';
    }

    public Integer getAvailableSlot() {
        return availableSlot;
    }

    public void setAvailableSlot(Integer availableSlot) {
        this.availableSlot = availableSlot;
    }
}
