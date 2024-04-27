from django.db import models

# Create your models here.

class Chiste(models.Model):
    titulo = models.CharField(max_length=256)
    cuerpo = models.TextField()
    adulto = models.BooleanField()
    fecha = models.DateField(auto_now=True)

    def __str__(self):
        return f'{self.titulo} {self.adulto}'