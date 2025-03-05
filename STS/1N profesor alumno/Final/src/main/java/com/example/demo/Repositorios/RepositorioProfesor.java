package com.example.demo.Repositorios;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.Entidades.Profesor;

public interface RepositorioProfesor extends JpaRepository <Profesor,Long> {

}
