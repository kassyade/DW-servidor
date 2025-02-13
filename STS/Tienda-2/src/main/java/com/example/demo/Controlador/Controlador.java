package com.example.demo.Controlador;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PatchMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.Entidades.Producto;
import com.example.demo.Repositorios.RepositorioProducto;

@RestController
@RequestMapping("/tienda")
public class Controlador {

	@Autowired
	private RepositorioProducto repositorioProducto;
	
	@GetMapping("")
	public ResponseEntity<List<Producto>>listarProductos(){
		
		/*if(repositorioProducto.findAll().isEmpty()) {
			Producto x = new Producto ("LSD",15);
			repositorioProducto.save(x);
			
		}
		*/
		return ResponseEntity.ok(repositorioProducto.findAll());
	}
	
	@PostMapping("")
	public ResponseEntity<String> crearProducto( @RequestBody Producto producto  ){
		
		//si la lista esta vacia lo creamos 
		if(repositorioProducto.findByNombre(producto.getNombre()).isEmpty()  ) {
			repositorioProducto.save(producto);
			
			return ResponseEntity.ok("producto creado");
		}else {
			return ResponseEntity.badRequest().body("el producto ya existe");
		}

		
	}
	
	@DeleteMapping("/{id}")
	public ResponseEntity<String> borrarProducto( @PathVariable("id") Long id   ){
		System.out.println(id);
		if(repositorioProducto.findById(id)!=null) {
			repositorioProducto.deleteById(id);

			return ResponseEntity.ok("producto encontrado y eliminado");
		}else {
			return ResponseEntity.badRequest().body("producto no encontrado");	
		}
		
		
		
	}
	
	//PUT SE UTILIZA PARA REEMPLAZAR 
	@PutMapping("/{id}")
	public ResponseEntity<?> reemplazarProducto( @PathVariable("id")Long id ,@RequestBody Producto producto  ){
		if(repositorioProducto.findById(id).isPresent()) {
			System.out.println("encontrado");
			Producto h = repositorioProducto.findById(id).get();
		//	System.out.println(h.getNombre());
			//System.out.println(h.getPrecio());
			h.setNombre(producto.getNombre());
			h.setPrecio(producto.getPrecio());
			
			repositorioProducto.save(h);
			return ResponseEntity.ok("producto actualizado");
		}else {
			System.out.println("no encontrado");
			return ResponseEntity.badRequest().body("producto no encontrado");
		}
		
	
		
	}
	
	@PatchMapping("/{id}")
	public  ResponseEntity<?> actualizarProducto (  @PathVariable("id") Long id ,@RequestBody Producto producto   ){
		
		Producto p = repositorioProducto.findById(id).get();
		
		
		
		if(producto.getNombre()== null && producto.getPrecio()==null) {
			return ResponseEntity.badRequest().body("No se itroducieron datos para actualizar el elemento");
		}else {
			
			if(!producto.getNombre().isEmpty()) {
				p.setNombre(producto.getNombre());
				repositorioProducto.save(p);
			}
			
			if(producto.getPrecio()!=null) {
				p.setPrecio(producto.getPrecio());
				repositorioProducto.save(p);
			}
			
			return ResponseEntity.ok("el producto fue actualizado");
			
			
		}
		
	
	}
	
	
	
	
	
}
