package quiz.sql.quizsql;

public class Pregunta {
    
    private int numeroPregunta;
    private int puntuacion;

    //creamos el constructor

    public Pregunta(int numeroPregunta,int puntuacion){
        this.numeroPregunta=numeroPregunta;
        this.puntuacion=puntuacion;
    }


    public int getPuntuacion() {
        return puntuacion;
    }

    public void setPuntuacion(int puntuacion) {
        this.puntuacion = puntuacion;
    }

    public int getNumeroPregunta() {
        return numeroPregunta;
    }

    public void setNumeroPregunta(int numeroPregunta) {
        this.numeroPregunta = numeroPregunta;
    }

}