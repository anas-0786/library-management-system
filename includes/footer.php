<?php
function includeFooter() {
    ?>
    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>E-Ramdoot Library</h3>
                <p>Your gateway to knowledge and learning. Explore our vast collection of digital resources and enhance your learning journey.</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> 123 Library Street, Knowledge City</li>
                    <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                    <li><i class="fas fa-envelope"></i> contact@eramdootlibrary.com</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest updates and resources.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> E-Ramdoot Library. All rights reserved.</p>
            <div class="footer-bottom-links">
                <a href="privacy.php">Privacy Policy</a>
                <a href="terms.php">Terms of Service</a>
            </div>
        </div>
    </footer>

    <style>
        .site-footer {
            background: #f8f9fa;
            color: #2c3e50;
            padding: 4rem 0 0;
            margin-top: 4rem;
            border-top: 1px solid #e9ecef;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section {
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: #3498db;
        }

        .footer-section p {
            color: #34495e;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .social-link {
            color: #2c3e50;
            background: #e9ecef;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #3498db;
            color: white;
            transform: translateY(-3px);
        }

        .contact-info {
            list-style: none;
            padding: 0;
        }

        .contact-info li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #34495e;
            font-size: 1rem;
        }

        .contact-info i {
            color: #3498db;
            font-size: 1.1rem;
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .newsletter-form input {
            flex: 1;
            min-width: 200px;
            padding: 0.75rem;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            background: white;
            font-size: 1rem;
        }

        .newsletter-form button {
            background: #3498db;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
            white-space: nowrap;
        }

        .newsletter-form button:hover {
            background: #2980b9;
        }

        .footer-bottom {
            background: #e9ecef;
            padding: 1.5rem 2rem;
            margin-top: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-bottom p {
            margin: 0;
            color: #34495e;
            font-size: 0.95rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-bottom-links a {
            color: #34495e;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.95rem;
        }

        .footer-bottom-links a:hover {
            color: #3498db;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .footer-content {
                max-width: 100%;
                padding: 0 1.5rem;
            }
        }

        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }

            .footer-section {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .site-footer {
                padding: 3rem 0 0;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 0 1rem;
            }

            .footer-section h3 {
                font-size: 1.3rem;
            }

            .footer-section p {
                font-size: 0.95rem;
            }

            .contact-info li {
                font-size: 0.95rem;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .newsletter-form input,
            .newsletter-form button {
                width: 100%;
            }

            .footer-bottom {
                padding: 1.5rem 1rem;
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .footer-bottom-links {
                justify-content: center;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 480px) {
            .site-footer {
                padding: 2rem 0 0;
            }

            .footer-content {
                gap: 1.5rem;
            }

            .footer-section h3 {
                font-size: 1.2rem;
            }

            .social-links {
                justify-content: center;
            }

            .contact-info li {
                font-size: 0.9rem;
            }

            .newsletter-form input {
                min-width: 100%;
            }
        }
    </style>
    <?php
}
?> 