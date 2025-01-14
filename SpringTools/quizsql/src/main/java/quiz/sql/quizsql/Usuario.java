package quiz.sql.quizsql;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Usuario {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY) // Define la clave primaria con autoincremento
    private Long id;

    private String nombre;

    @OneToMany(cascade = CascadeType.ALL, orphanRemoval = true) // Relación con Pregunta
    private List<Pregunta> preguntas = new ArrayList<>();

    private int puntuacionTotal; // Lleva la suma total de puntuaciones

    // Constructor vacío (necesario para JPA)
    public Usuario() {}

    // Constructor con parámetros
    public Usuario(String nombre, int puntuacionTotal) {
        this.nombre = nombre;
        this.puntuacionTotal = puntuacionTotal;
        this.preguntas = new ArrayList<>();
    }

    // Getters y Setters
    public Long getId() {
        return id;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public List<Pregunta> getPreguntas() {
        return preguntas;
    }

    public void setPreguntas(List<Pregunta> preguntas) {
        this.preguntas = preguntas;
    }

    public int getPuntuacionTotal() {
        return puntuacionTotal;
    }

    public void agregarPuntuacion(int puntuacion) {
        this.puntuacionTotal += puntuacion; // Suma la puntuación
    }
}
