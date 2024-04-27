from django.shortcuts import render
from .models import FamiliaProfesional

def lista_familias(request):
    familias = FamiliaProfesional.objects.all()
    return render(request, 'fp/lista_familias.html', {'familias': familias})

def detalle_ciclo(request, familia_id):
    familia = FamiliaProfesional.objects.get(pk=familia_id)
    ciclos = familia.ciclo_set.all()
    return render(request, 'fp/detalle_ciclo.html', {'familia': familia, 'ciclos': ciclos})
