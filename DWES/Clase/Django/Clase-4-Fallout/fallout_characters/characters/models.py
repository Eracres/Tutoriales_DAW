from django.db import models

class Character(models.Model):
    name = models.CharField(max_length=100)
    slug = models.SlugField(unique=True)
    description = models.TextField()
    cover_photo = models.ImageField(upload_to='character_covers/')
    detail_photo = models.ImageField(upload_to='character_details/')

    def __str__(self):
        return self.name
