package quiz.id.quiz;

import java.util.ArrayList;
import java.util.List;

public class Usuario {

    private String nombre;
    private List<Pregunta> preguntas;
    private int puntuacionTotal; // Nueva variable para llevar la suma total de puntuaciones

    public Usuario() {
        this.preguntas = new ArrayList<>();
        this.puntuacionTotal = 0; // Inicializamos en 0
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
    public void agregarPuntuacion(int puntuacion) {
        this.puntuacionTotal += puntuacion; // Suma la puntuación
    }

    public int getPuntuacionTotal() {
        return puntuacionTotal;
    }
}
