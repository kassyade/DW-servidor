package com.example.demo.Repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.Entidades.Alumno;

public interface RepositorioAlumno  extends JpaRepository<Alumno,Long> {

}
