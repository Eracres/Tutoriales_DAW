# Generated by Django 5.0.4 on 2024-05-05 09:50

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Cancion',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.TextField()),
                ('genero', models.CharField(choices=[('rock', 'Rock'), ('pop', 'Pop'), ('jazz', 'Jazz'), ('clasica', 'Música Clásica'), ('electronica', 'Electrónica'), ('hip_hop', 'Hip Hop'), ('reggae', 'Reggae'), ('metal', 'Metal'), ('blues', 'Blues'), ('country', 'Country')], max_length=20)),
                ('fichero', models.FileField(upload_to='doc/sings')),
            ],
        ),
    ]