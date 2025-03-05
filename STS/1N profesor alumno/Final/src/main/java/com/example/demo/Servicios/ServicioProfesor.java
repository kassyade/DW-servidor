package com.example.demo.Servicios;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.Entidades.Profesor;
import com.example.demo.Repositorios.RepositorioProfesor;

@Service
public class ServicioProfesor {

	@Autowired
	RepositorioProfesor repositorioProfesor;
	
	//CRUD
	
	//Guardar 
	
	public Profesor guardarProfesor(Profesor profesor) {

		repositorioProfesor.save(profesor);
		return null;
	}
	
	//leer retorna la lista encontrada 
	
	
	public List<Profesor> listaProfesor(){
		
		return repositorioProfesor.findAll();
	}
	
	//Buscar retorna el profesor encontrado
	
	public Profesor buscarProfesor(Long id ) {
		return repositorioProfesor.findById(id).orElse(null) ;
	}
	
	//Borrar es una accion no retorna nada
	
	public Profesor borrarProfesor(Long id) {
		
		repositorioProfesor.deleteById(id);
	return null;
	}
	
	
	
}
