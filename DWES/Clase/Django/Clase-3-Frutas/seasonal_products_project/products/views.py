from django.shortcuts import render
from django.db import models
from .models import Product

def month_list(request):
    months = [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ]
    return render(request, 'products/month_list.html', {'months': months})

def products_by_month(request, month):
    products = Product.objects.filter(
        models.Q(start_season__month=month) | 
        models.Q(end_season__month=month) | 
        models.Q(available_all_year=True)
    )
    return render(request, 'products/products_by_mounth.html', {'products': products})

