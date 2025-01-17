package com.example.demo;

import java.util.HashSet;
import java.util.Set;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Profesor {
	
	
	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	Long idProfesor;
	
	private String nombre;
	
	//Define la relacion 1 N
	@OneToMany(cascade=CascadeType.ALL,orphanRemoval=true)//creacion en cascada
	Set<Email> emails = new HashSet<Email>();

	public Long getIdProfesor() {
		return idProfesor;
	}

	public void setIdProfesor(Long idProfesor) {
		this.idProfesor = idProfesor;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public Set<Email> getEmails() {
		return emails;
	}

	public void setEmails(Set<Email> emails) {
		this.emails = emails;
	}
	
	public void addEmail(Email email) {
		emails.add(email);
	}
	public void delEmail(Email email) {
		emails.remove(email);
	}
	
	public  Profesor() {}
	
	public Profesor(String nombre) {
		super();
		this.nombre=nombre;
		
	}
	
	
	
	
}
