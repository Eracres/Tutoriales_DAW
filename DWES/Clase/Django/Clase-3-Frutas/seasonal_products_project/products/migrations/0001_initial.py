# Generated by Django 5.0.1 on 2024-04-23 02:30

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Product',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('photo', models.ImageField(upload_to='product_photos/')),
                ('description', models.TextField()),
                ('start_season', models.DateField()),
                ('end_season', models.DateField()),
                ('available_all_year', models.BooleanField(default=False)),
            ],
        ),
    ]
