@include('frntLayout.header')

                  <br>
                  <br>
                  <div class="row">
                      <div class="col-md-7">
                          <a href="#">
                              <img class="img-fluid rounded mb-3 mb-md-0" src="{{asset('shop/images/product_1.jpg')}}" alt="">
                          </a>
                      </div>
                      <div class="col-md-5">
                          <h3>{{$item->name}}</h3>
                          <h3>{{$item->desc}}</h3>
                          <h3>Rs. 1000</h3>
                          <p></p>
                          <a class="btn btn-danger" href="{{'/chkout'}}">Checkout</a>
                      </div>
                  </div>

              <strong>Total:</strong>

              <hr>
              <a href="" type="button" class="btn-success">Check Out</a>
              </ul>
              <a href="" type="button" class="btn-danger">Clear<i class="fas fa-trash-alt"></i></a>

              <div class="col-md-7">
                <a href="">Back to Tees</a>
              </div>
