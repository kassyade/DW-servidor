package com.example.demo.Repositorios;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.Entidades.Producto;

public interface RepositorioProducto extends JpaRepository<Producto,Long> {

	List<Producto> findByNombre(String nombre); 
	
}
