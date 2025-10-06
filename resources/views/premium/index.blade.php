@extends('layouts.dashboard')

@section('dashboardContent')
<div class="container" style="margin-bottom: 20px;">
    <div class="row">
        <!-- Left Column - Content -->
        <div class="col-lg-7">
            <div class="premium-hero bg-gradient-primary p-5 rounded-4 shadow-lg position-relative overflow-hidden">
                <div class="position-absolute top-0 end-0 opacity-10" style="font-size: 8rem;">🚀</div>

                <div class="position-relative">
                    <h2 class="fw-extrabold text-white mb-4">
                        Hola, {{ auth()->user()->name }}!<br>
                        <span class="d-inline-block mt-2">Desbloquea Premium para<br>obtener beneficios exclusivos</span>
                    </h2>

                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset('images/funeraria.png') }}"
                             class="me-3" style="width: 50px; height: 50px; object-fit: contain;">
                        <div>
                            <p class="lead text-white mb-1">Estás en:</p>
                            <h2 class="text-warning h3 mb-0">{{ $funeralHomeDetails['name'] }}</h2>
                        </div>
                    </div>

                    <div class="premium-benefits mb-5">
                        <div class="d-flex align-items-center mb-4 p-3 bg-white bg-opacity-10 rounded-3">
                            <i class="fas fa-medal fa-2x text-warning me-4"></i>
                            <div>
                                <h3 class="h5 text-dark mb-1">Acceso Ilimitado</h3>
                                <p class="text-dark-50 small mb-0">Todas las funciones premium disponibles 24/7</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4 p-3 bg-white bg-opacity-10 rounded-3">
                            <i class="fas fa-headset fa-2x text-danger me-4"></i>
                            <div>
                                <h3 class="h5 text-dark mb-1">Soporte Técnico</h3>
                                <p class="text-dark-50 small mb-0">Asistencia personalizada y soporte prioritario</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center p-3 bg-white bg-opacity-10 rounded-3">
                            <i class="fas fa-chart-line fa-2x text-success me-4"></i>
                            <div>
                                <h3 class="h5 text-dark mb-1">Recursos Exclusivos</h3>
                                <p class="text-dark-50 small mb-0">Reportes y estadísticas avanzadas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Pricing Card -->
        <div class="col-lg-5">
            <div class="premium-card h-100 p-5 bg-white rounded-4 shadow-lg position-relative">
                <div class="position-absolute top-0 start-0 w-100 text-center mt-n4">
                    <span class="badge bg-danger py-2 px-3 fs-6 shadow">🔥 30% OFF Primer Mes</span>
                </div>

                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark mb-3">Premium</h2>
                    <div class="d-flex justify-content-center align-baseline mb-3">
                        <span class="h3 text-muted">$</span>
                        <span class="display-4 fw-bold text-dark mx-2">599 mxn.</span>
                        <span class="h5 align-self-end text-muted">/mes</span>
                    </div>
                    <p class="text-muted">Renovación automática. Cancela cuando quieras</p>
                </div>

                <ul class="list-unstyled mb-5">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Hasta 10 sucursales adicionales</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Reportes y estadísticas avanzadas</span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                        <span>Soporte prioritario 24/7</span>
                    </li>
                </ul>
                <!-- Modificar el botón para abrir el modal -->
                <a href="#"
                   class="btn btn-primary btn-lg w-100 py-3 fw-bold shadow-sm hover-lift"
                   data-bs-toggle="modal"
                   data-bs-target="#paymentModal">
                    <i class="fas fa-crown me-2"></i>Obtener Premium Ahora
                </a>

                <div class="text-center mt-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('icons/secure-payment.png') }}"
                             alt="Secure Payments" class="me-2" style="width: 24px;">
                        <small class="text-muted">Pagos seguros con cifrado SSL</small>
                    </div>
                    <div class="trust-badge mt-3">
                        <small class="d-block text-muted mb-1">+5,000 profesionales premium</small>
                        <div class="d-flex justify-content-center gap-2">
                            <img src="{{ asset('icons/trustpilot.png') }}" alt="Trustpilot" style="height: 20px;">
                            <img src="{{ asset('icons/bbb.png') }}" alt="BBB" style="height: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assurance Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="bg-light p-4 rounded-3 text-center shadow-sm">
                <div class="d-flex flex-wrap justify-content-center gap-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock fa-lg text-primary me-2"></i>
                        <span class="small">Configuración en 2 minutos</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-smile-beam fa-lg text-success me-2"></i>
                        <span class="small">Garantía de satisfacción de 14 días</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-sync-alt fa-lg text-info me-2"></i>
                        <span class="small">Cambio de plan gratuito</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .premium-hero {
        background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%);
    }

    .premium-card {
        transition: transform 0.3s ease;
    }

    .premium-card:hover {
        transform: translateY(-5px);
    }

    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hover-lift:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
</style>


<!-- Modal de Pagos -->
<!-- Modal de Pagos Completo -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="paymentModalLabel">Selecciona tu Plan Premium</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Selector de Planes -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="plan-card monthly-plan active-plan p-4 rounded-3 shadow-sm" data-plan="monthly">
                            <h4 class="fw-bold">Plan Mensual</h4>
                            <div class="price display-4 fw-bold">$599 mxn</div>
                            <small class="text-muted">por mes</small>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="radio" name="plan" id="monthlyPlan" checked>
                                <label class="form-check-label" for="monthlyPlan">
                                    Seleccionar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="plan-card annual-plan p-4 rounded-3 shadow-sm" data-plan="annual">
                            <h4 class="fw-bold">Plan Anual</h4>
                            <div class="price display-4 fw-bold">$6000 mxn</div>
                            <small class="text-muted">($500mxn/mes)</small>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="radio" name="plan" id="annualPlan">
                                <label class="form-check-label" for="annualPlan">
                                    Seleccionar
                                </label>
                            </div>
                            <span class="badge bg-success mt-2">Ahorra 20%</span>
                        </div>
                    </div>
                </div>

                <!-- Selector de Método de Pago -->
                <nav class="nav nav-pills flex-column flex-sm-row mb-4">
                    <button class="flex-sm-fill text-sm-center nav-link active" type="button" data-payment-method="card">
                        <i class="fas fa-credit-card me-2"></i>Tarjeta
                    </button>
                    <button class="flex-sm-fill text-sm-center nav-link" type="button" data-payment-method="spei">
                        <i class="fas fa-university me-2"></i>Transferencia SPEI
                    </button>
                    <button class="flex-sm-fill text-sm-center nav-link" type="button" data-payment-method="stores">
                        <i class="fas fa-store me-2"></i>Tiendas
                    </button>
                </nav>

                <!-- Formulario para Tarjeta -->
                <form id="cardForm" class="payment-method-content" data-method="card">
                    <!-- Selector Crédito/Débito -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group w-100" role="group">
                                <button type="button" class="btn btn-outline-primary active" data-card-type="credit">
                                    <i class="fas fa-credit-card me-2"></i>Crédito
                                </button>
                                <button type="button" class="btn btn-outline-primary" data-card-type="debit">
                                    <i class="fas fa-money-bill-alt me-2"></i>Débito
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Campos comunes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="cardholderName" class="form-label">Nombre en la Tarjeta</label>
                                <input type="text" class="form-control" id="cardholderName" required>
                            </div>
                        </div>
                    </div>

                    <!-- Campos específicos Crédito -->
                    <div class="credit-fields">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Número de Tarjeta</label>
                                    <input type="text" class="form-control" id="cardNumber" required
                                           pattern="\d{16}" title="Debe contener 16 dígitos">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expiryDate" class="form-label">Fecha de Expiración (MM/AA)</label>
                                    <input type="text" class="form-control" id="expiryDate" required
                                           pattern="\d{2}/\d{2}" title="Formato MM/AA">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" required
                                           pattern="\d{3}" title="Debe contener 3 dígitos">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campos específicos Débito -->
                    <div class="debit-fields d-none">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="debitCardNumber" class="form-label">Número de Tarjeta</label>
                                    <input type="text" class="form-control" id="debitCardNumber"
                                           pattern="\d{16}" title="Debe contener 16 dígitos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="iban" class="form-label">CLABE Interbancaria</label>
                                    <input type="text" class="form-control" id="iban"
                                           pattern="\d{18}" title="Debe contener 18 dígitos">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Contenido para SPEI -->
                <div class="payment-method-content d-none" data-method="spei">
                    <div class="alert alert-info">
                        <h5 class="alert-heading">Instrucciones para pago SPEI</h5>
                        <ol>
                            <li>Realiza la transferencia desde tu banca en línea</li>
                            <li>Usa los siguientes datos bancarios:</li>
                        </ol>
                        <div class="bg-light p-3 rounded">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold">CLABE:</span>
                                <span>012180015478921456</span>
                                <button class="btn btn-sm btn-outline-primary copy-btn" data-clipboard-text="012180015478921456">
                                    <i class="far fa-copy"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="fw-bold">Banco:</span>
                                <span>BBVA</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Beneficiario:</span>
                                <span>Binary Titans S.A. de C.V.</span>
                            </div>
                        </div>
                        <hr>
                        <p class="mb-0">Después de realizar el pago, envía tu comprobante a comprobantes@empresa.com</p>
                    </div>
                </div>

                <!-- Contenido para Tiendas -->
                <div class="payment-method-content d-none" data-method="stores">
                    <div class="alert alert-warning">
                        <h5 class="alert-heading">Pago en Tiendas Conveniencia</h5>
                        <div class="mb-3">
                            <img src="{{ asset('images/oxxo_logo.png') }}" alt="OXXO" class="img-fluid me-3" style="height: 30px;">
                            <img src="{{ asset('images/7_eleven.png') }}" alt="7-Eleven" class="img-fluid" style="height: 30px;">
                        </div>
                        <p>Se generará una referencia de pago que podrás usar en cualquier tienda participante.</p>
                        <button class="btn btn-outline-primary" id="generateReferenceBtn">
                            Generar Referencia
                        </button>
                        <div id="referenceDetails" class="mt-3 d-none">
                            <div class="bg-light p-3 rounded">
                                <h6>Tu referencia de pago:</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold display-6">8990 1234 5678</span>
                                    <button class="btn btn-sm btn-primary copy-btn" data-clipboard-text="899012345678">
                                        <i class="far fa-copy"></i> Copiar
                                    </button>
                                </div>
                                <p class="text-muted mt-2 small">* La referencia expira en 72 horas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Términos y Condiciones -->
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                    <label class="form-check-label" for="termsCheck">
                        Acepto los <a href="#">Términos de Servicio</a> y la <a href="#">Política de Privacidad</a>
                    </label>
                </div>

                <!-- Botón de Confirmación -->
                <button type="button" class="btn btn-primary w-100 py-3 mt-3" id="confirmPaymentBtn">
                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                    Completar Pago
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cambiar métodos de pago principales
    document.querySelectorAll('[data-payment-method]').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('[data-payment-method]').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.payment-method-content').forEach(c => c.classList.add('d-none'));

            this.classList.add('active');
            const method = this.dataset.paymentMethod;
            document.querySelector(`.payment-method-content[data-method="${method}"]`).classList.remove('d-none');

            const btnText = {
                card: 'Pagar con Tarjeta',
                spei: 'Confirmar Transferencia',
                stores: 'Generar Referencia'
            };
            document.getElementById('confirmPaymentBtn').textContent = btnText[method];
        });
    });

    // Cambiar tipo de tarjeta (Crédito/Débito)
    document.querySelectorAll('[data-card-type]').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('[data-card-type]').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const type = this.dataset.cardType;
            document.querySelector('.credit-fields').classList.toggle('d-none', type !== 'credit');
            document.querySelector('.debit-fields').classList.toggle('d-none', type !== 'debit');

            document.querySelectorAll('.credit-fields input').forEach(input => input.required = type === 'credit');
            document.querySelectorAll('.debit-fields input').forEach(input => input.required = type === 'debit');
        });
    });

    // Copiar al portapapeles
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.dataset.clipboardText;
            navigator.clipboard.writeText(text).then(() => {
                this.innerHTML = '<i class="fas fa-check"></i> Copiado!';
                setTimeout(() => {
                    this.innerHTML = `<i class="far fa-copy"></i> ${this.textContent.includes('Copiar') ? 'Copiar' : ''}`;
                }, 2000);
            });
        });
    });

    // Generar referencia para tiendas
    document.getElementById('generateReferenceBtn').addEventListener('click', function() {
        document.getElementById('referenceDetails').classList.remove('d-none');
        this.disabled = true;
    });

    // Manejar envío del formulario
    document.getElementById('confirmPaymentBtn').addEventListener('click', function() {
        if (!document.getElementById('termsCheck').checked) {
            alert('Debes aceptar los términos y condiciones');
            return;
        }

        const spinner = this.querySelector('.spinner-border');
        spinner.classList.remove('d-none');
        this.disabled = true;

        const activeMethod = document.querySelector('[data-payment-method].active').dataset.paymentMethod;

        // Simular procesamiento
        setTimeout(() => {
            spinner.classList.add('d-none');
            this.disabled = false;
            alert('Pago procesado exitosamente!');
            $('#paymentModal').modal('hide');
        }, 2000);
    });
});
</script>

<!-- Estilos -->
<style>
.payment-method-content {
    transition: all 0.3s ease;
}

.plan-card {
    cursor: pointer;
    transition: transform 0.2s;
    border: 2px solid transparent;
}

.plan-card:hover {
    transform: translateY(-5px);
    border-color: #0d6efd;
}

.active-plan {
    border-color: #0d6efd;
    background-color: #f8f9fa;
}

.btn-outline-primary.active {
    background-color: #0d6efd;
    color: white !important;
    border-color: #0d6efd !important;
}

.copy-btn:hover {
    transform: scale(1.05);
}
</style>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stripe = Stripe('{{ config('services.stripe.key') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#cardElement');

        // Manejar selección de plan
        document.querySelectorAll('.plan-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.plan-card').forEach(c => c.classList.remove('active-plan'));
                this.classList.add('active-plan');
                document.querySelector(`#${this.dataset.plan}Plan`).checked = true;
            });
        });

        // Manejar envío del formulario
        const form = document.getElementById('paymentForm');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.querySelector('.spinner-border').classList.remove('d-none');

            const { error, paymentMethod } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: document.getElementById('cardholderName').value
                }
            });

            if (error) {
                document.getElementById('cardErrors').textContent = error.message;
                submitButton.disabled = false;
                submitButton.querySelector('.spinner-border').classList.add('d-none');
            } else {
                // Enviar paymentMethod.id a tu servidor
                const planType = document.querySelector('input[name="plan"]:checked').id.replace('Plan', '');

                fetch('/process-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        payment_method_id: paymentMethod.id,
                        plan: planType,
                        funeral_home_id: '{{ $funeralHomeDetails["id"] }}'
                    })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.error) {
                        alert(result.error);
                    } else {
                        window.location.href = '/payment-success';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
</script>
@endsection
