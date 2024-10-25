from flask import Flask, redirect, url_for, request
import mercadopago
from config import MERCADOPAGO_CLIENT_ID, MERCADOPAGO_CLIENT_SECRET

app = Flask(__name__)

@app.route('/pagar')
def pagar():
    # Inicializa el cliente de Mercado Pago
    mercadopago.configurations.set_client_id(MERCADOPAGO_CLIENT_ID)
    mercadopago.configurations.set_client_secret(MERCADOPAGO_CLIENT_SECRET)

    # Configura la preferencia de pago
    preference = {
        "items": [
            {
                "title": "Mi producto",
                "quantity": 1,
                "unit_price": 100,
            }
        ]
    }

    # Crea la preferencia de pago
    mp = mercadopago.MP(MERCADOPAGO_CLIENT_ID, MERCADOPAGO_CLIENT_SECRET)
    response = mp.post("/checkout/preferences", preference)

    # Redirige al usuario a la URL de pago
    redirect_url = response["response"]["init_point"]
    return redirect(redirect_url)

if __name__ == '__main__':
    app.run(debug=True)