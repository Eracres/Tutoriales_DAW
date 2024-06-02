from rest_framework.routers import DefaultRouter
from .api_views import ObraDeArteViewSet

router = DefaultRouter()
router.register(r'obras', ObraDeArteViewSet)

urlpatterns = router.urls
