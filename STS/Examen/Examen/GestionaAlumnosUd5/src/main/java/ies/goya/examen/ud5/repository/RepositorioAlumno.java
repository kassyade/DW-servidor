package ies.goya.examen.ud5.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import ies.goya.examen.ud5.model.Alumno;

public interface RepositorioAlumno extends JpaRepository<Alumno,Long>{
	
	
}
