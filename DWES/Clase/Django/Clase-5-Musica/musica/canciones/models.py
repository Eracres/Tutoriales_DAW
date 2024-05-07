from django.db import models

class Cancion(models.Model):
    nombre = models.TextField()
    artista = models.TextField(null=True)
    GENERO_CHOICES = [
        ('Rock', 'Rock'),
        ('Pop', 'Pop'),
        ('Jazz', 'Jazz'),
        ('Clásica', 'Música Clásica'),
        ('Electrónica', 'Electrónica'),
        ('Hip Hop', 'Hip Hop'),
        ('Reggae', 'Reggae'),
        ('Metal', 'Metal'),
        ('Blues', 'Blues'),
        ('Country', 'Country'),
    ]
    genero = models.CharField(max_length=20, choices=GENERO_CHOICES)
    fichero = models.FileField(upload_to='doc/sings')

    def __str__(self):
        return f'{self.nombre} ({self.artista}) -> {self.genero}'


