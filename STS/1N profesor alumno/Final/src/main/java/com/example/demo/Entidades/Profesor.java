package com.example.demo.Entidades;

import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.validation.constraints.NotBlank;

@Entity
public class Profesor {

	
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Long id;
	
	
	@NotBlank(message="el nombre no puede ir vacío")
	private String nombre;

	@OneToMany(mappedBy = "profesor", cascade = CascadeType.REMOVE)
	private List<Alumno> alumnos;

	
	public Profesor() {}

	public Profesor(String nombre) {
		this.nombre=nombre;
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





}
