package com.example.demo;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Email {
	
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	Long idEmail;
	
	private String direccion ;
	
	public Email(String direccion) {
		super();
		this.direccion=direccion;
	}

	
	public Email() {
		super();
	}


	public Email(Long idEmail, String direccion, String nombre) {
		super();
		this.idEmail = idEmail;
		this.direccion = direccion;
		this.nombre = nombre;
	}


	private  String nombre ;

	public Long getIdEmail() {
		return idEmail;
	}

	public void setIdEmail(Long idEmail) {
		this.idEmail = idEmail;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getDireccion() {
		return direccion;
	}

	public void setDireccion(String direccion) {
		this.direccion = direccion;
	}
	
	

}
