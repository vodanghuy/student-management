package com.example.studentmanagement.models;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;

import java.io.Serializable;

@Entity
public class Class implements Serializable {
    @Id
    private String id;
    private String name;

    public Class(String id, String name) {
        this.id = id;
        this.name = name;
    }

    public Class() {
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

    @Override
    public String toString() {
        return "Class{" +
                "id='" + id + '\'' +
                ", name='" + name + '\'' +
                '}';
    }
}
