# Generated by Django 5.0.4 on 2024-05-05 18:26

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('canciones', '0002_alter_cancion_genero'),
    ]

    operations = [
        migrations.AddField(
            model_name='cancion',
            name='artista',
            field=models.TextField(null=True),
        ),
    ]