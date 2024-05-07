from django import forms
from .models import Cancion
from django.core.exceptions import ValidationError
from django.utils.translation import gettext_lazy as _

def validate_mp3(value):
    if not value.name.endswith('.mp3'):
        raise ValidationError(
            _('El archivo debe ser de tipo MP3.'),
            params={'value': value},
        )

class CancionForm(forms.ModelForm):
    fichero = forms.FileField(
        label='Fichero',
        validators=[validate_mp3],
        widget=forms.FileInput(attrs={'accept': 'audio/mpeg'}),
    )

    class Meta:
        model = Cancion
        fields = ['nombre', 'artista', 'genero', 'fichero']
        widgets = {
            'nombre': forms.TextInput(attrs={'class': 'small-input'}),
            'artista': forms.TextInput(attrs={'class': 'small-input'}),
        }
