package ies.goya.examen.ud5.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import ies.goya.examen.ud5.model.Alumno;


public interface RepositorioAlumno extends JpaRepository<Alumno,Long>{
	List<Alumno> findByNombre(String nombre); 
	
}
