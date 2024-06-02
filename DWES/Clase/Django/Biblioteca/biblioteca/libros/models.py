from typing import Iterable
from django.db import models
from django.utils.text import slugify

class Autor(models.Model):
    nombre = models.CharField(max_length=50)
    apellido = models.CharField(max_length=50)
    biografia = models.TextField()
    fecha_nacimiento = models.DateField()
    foto = models.ImageField(upload_to='autores/')
    slug = models.SlugField(blank=True, null=True)


    def __str__(self):
        return f'{self.nombre} {self.apellido}'
    
    def save(self, *arg, **kwargs) -> None:
        if not self.slug:
            self.slug = slugify(self.nombre)
        super().save(*arg, **kwargs)

class Libro(models.Model):
    autor = models.ForeignKey(Autor, on_delete=models.CASCADE)
    titulo = models.CharField(max_length=50)
    sinopsis = models.TextField()     
    fecha_publicacion = models.DateField()  
    imagen = models.ImageField(upload_to='libros/')
    slug = models.SlugField(blank=True, null=True)

    def __str__(self):
        return f'{self.titulo}'
    
    def save(self, *arg, **kwargs) -> None:
        if not self.slug:
            self.slug = slugify(self.titulo)
        super().save(*arg, **kwargs)

