from django.shortcuts import render
from django.core.paginator import Paginator
from .models import Mantenimiento

def index(request):
    return render(request, 'mantenimiento/index.html')

def lista_mantenimientos(request):
    mantenimientos_list = Mantenimiento.objects.all()
    paginator = Paginator(mantenimientos_list, 4)  # Paginar cada 4 mantenimientos
    page_number = request.GET.get('page')
    page_obj = paginator.get_page(page_number)
    return render(request, 'mantenimiento/lista_mantenimientos.html', {'page_obj': page_obj})

def detalle_mantenimiento(request, mantenimiento_id):
    mantenimiento = Mantenimiento.objects.get(pk=mantenimiento_id)
    return render(request, 'mantenimiento/detalle_mantenimiento.html', {'mantenimiento': mantenimiento})

