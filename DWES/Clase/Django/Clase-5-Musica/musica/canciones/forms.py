from django import forms
from .models import Cancion

class CancionForm(forms.ModelForm):
    class Meta:
        model = Cancion
        fields = ['nombre', 'artista', 'genero', 'fichero']
        widgets = {
            'nombre': forms.TextInput(attrs={'class': 'small-input'}),
            'artista': forms.TextInput(attrs={'class': 'small-input'}),
        }
