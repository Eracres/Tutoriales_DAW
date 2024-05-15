from django.db import models

class Meme(models.Model):
    imagen = models.ImageField(upload_to='memes/')
    descripcion = models.TextField()

class Comentario(models.Model):
    meme = models.ForeignKey(Meme, on_delete=models.CASCADE)
    nombre_autor = models.CharField(max_length=100)
    texto = models.TextField()
    fecha_publicacion = models.DateTimeField(auto_now_add=True)

