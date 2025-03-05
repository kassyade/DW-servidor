package com.example.demo.Servicios;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.Entidades.Alumno;
import com.example.demo.Repositorios.RepositorioAlumno;

@Service
public class ServicioAlumno {

	@Autowired
	RepositorioAlumno repositorioAlumno;
	

	//CRUD
	
	//Guardar 
	
	public Alumno guardarAlumno(Alumno Alumno) {

		repositorioAlumno.save(Alumno);
		return null;
	}
	
	//leer retorna la lista encontrada 
	
	
	public List<Alumno> listaAlumno(){
		
		return repositorioAlumno.findAll();
	}
	
	//Buscar retorna el Alumno encontrado
	
	public Optional<Alumno> buscarAlumno(Long id ) {
		return repositorioAlumno.findById(id) ;
	}
	
	//Borrar es una accion no retorna nada
	
	public Alumno borrarAlumno(Long id) {
		
		repositorioAlumno.deleteById(id);
	return null;
	}
	
	
}
