from django.db import models

class Edificio(models.Model):
    nombre = models.TextField(max_length=50)
    direccion = models.TextField(max_length=150)
    contacto = models.EmailField(max_length=100)

    def __str__(self):
        return self.nombre

class Tecnico(models.Model):
    nombre = models.TextField(max_length=50)
    especialidad = models.TextField(max_length=150)
    contacto = models.EmailField(max_length=100)
    
    def __str__(self):
        return self.nombre
    
class Mantenimiento(models.Model):
    fecha = models.DateField()
    descripcion = models.TextField(max_length=150)
    edificio = models.ForeignKey(Edificio, on_delete=models.CASCADE)
    tecnico = models.ForeignKey(Tecnico, on_delete=models.CASCADE)
    
    def __str__(self):
        return f"Mantenimiento en {self.edificio.nombre} por {self.tecnico.nombre}"