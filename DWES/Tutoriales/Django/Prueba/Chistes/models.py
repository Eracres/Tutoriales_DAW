from django.db import models

class Chistes(models.Model):
    titulo = models.TextField(max_length=256)
    cuerpo = models.TextField()
    adultos = models.BooleanField()
    fecha = models.DateField(auto_now=True)

    def __str__(self):
        return f'{self.titulo} {self.adultos}'