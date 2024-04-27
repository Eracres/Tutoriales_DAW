from django.db import models

class Product(models.Model):
    name = models.CharField(max_length=100)
    photo = models.ImageField(upload_to='product_photos/')
    description = models.TextField()
    start_season = models.DateField()
    end_season = models.DateField()
    available_all_year = models.BooleanField(default=False)

    def __str__(self):
        return self.name

