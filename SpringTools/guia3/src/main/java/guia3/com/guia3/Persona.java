package guia3.com.guia3;

import jakarta.validation.constraints.Max;
import jakarta.validation.constraints.Min;
import jakarta.validation.constraints.NotNull;
import jakarta.validation.constraints.Size;

public class Persona {
    @NotNull
    @Size(min=2 , max=30)//cantidad de caracteres
    private String nombre ;

    @NotNull
    @Min(18)
    @Max(120)
    private Integer edad ;

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public Integer getEdad() {
        return edad;
    }

    public void setEdad(Integer edad) {
        this.edad = edad;
    }

    @Override
    public String toString(){
        return "| Persona/Nombre"+this.nombre +"  /Edad:"+this.edad +"| ";
    }
}
