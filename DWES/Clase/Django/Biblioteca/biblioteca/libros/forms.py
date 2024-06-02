from django import forms
from .models import Autor, Libro

class AutorForm (forms.ModelForm):
    class Meta:
        model = Autor
        fields = '__all__'
        widgets = {
            'fecha_nacimiento': forms.DateInput(attrs={'type': 'date'})
        }

class LibroForm(forms.ModelForm):
    class Meta:
        model = Libro
        fields = ['titulo', 'sinopsis', 'fecha_publicacion', 'imagen']
        widgets = {
            'fecha_publicacion': forms.DateInput
            (attrs={'type': 'date'})
        }