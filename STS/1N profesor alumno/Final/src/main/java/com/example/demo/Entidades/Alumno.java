package com.example.demo.Entidades;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToOne;
import jakarta.validation.constraints.NotBlank;

@Entity
public class Alumno {

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	
	private Long id;
	
	@NotBlank(message="no puede ir vacío el nombre")
	private String nombre;
	
	
	@ManyToOne
	Profesor profesor;


	public Alumno () {
		
	}
	
	public Alumno (String nombre , Profesor profesor) {
		this.nombre=nombre;
		this.profesor=profesor;
	}
	public Long getId() {
		return id;
	}


	public void setId(Long id) {
		this.id = id;
	}


	public String getNombre() {
		return nombre;
	}


	public void setNombre(String nombre) {
		this.nombre = nombre;
	}


	public Profesor getProfesor() {
		return profesor;
	}


	public void setProfesor(Profesor profesor) {
		this.profesor = profesor;
	}
	
	
	
	
	
	
}
