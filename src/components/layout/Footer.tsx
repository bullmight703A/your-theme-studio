import { Link } from "react-router-dom";
import { Facebook, Instagram, Twitter, Youtube, MapPin, Phone, Mail, Award } from "lucide-react";
import logo from "@/assets/kidazzle-logo.png";

const Footer = () => {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-primary text-primary-foreground">
      {/* Main Footer */}
      <div className="container-site py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
          {/* Brand Column */}
          <div className="space-y-6">
            <Link to="/" className="inline-block">
              <img src={logo} alt="KIDazzle Academy" className="h-12 w-auto brightness-0 invert" />
            </Link>
            <p className="text-primary-foreground/80 leading-relaxed">
              Nurturing young minds through play-based learning and exceptional care since 2008.
            </p>
            <div className="flex gap-4">
              <a href="#" className="text-primary-foreground/70 hover:text-secondary transition-colors" aria-label="Facebook">
                <Facebook className="h-5 w-5" />
              </a>
              <a href="#" className="text-primary-foreground/70 hover:text-secondary transition-colors" aria-label="Instagram">
                <Instagram className="h-5 w-5" />
              </a>
              <a href="#" className="text-primary-foreground/70 hover:text-secondary transition-colors" aria-label="Twitter">
                <Twitter className="h-5 w-5" />
              </a>
              <a href="#" className="text-primary-foreground/70 hover:text-secondary transition-colors" aria-label="YouTube">
                <Youtube className="h-5 w-5" />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h3 className="font-semibold text-lg mb-6">Quick Links</h3>
            <ul className="space-y-3">
              <li>
                <Link to="/programs" className="text-primary-foreground/80 hover:text-secondary transition-colors">
                  Our Programs
                </Link>
              </li>
              <li>
                <Link to="/about" className="text-primary-foreground/80 hover:text-secondary transition-colors">
                  About Us
                </Link>
              </li>
              <li>
                <Link to="/locations" className="text-primary-foreground/80 hover:text-secondary transition-colors">
                  Find a Location
                </Link>
              </li>
              <li>
                <Link to="/contact" className="text-primary-foreground/80 hover:text-secondary transition-colors">
                  Book a Tour
                </Link>
              </li>
              <li>
                <a href="#careers" className="text-primary-foreground/80 hover:text-secondary transition-colors">
                  Careers
                </a>
              </li>
            </ul>
          </div>

          {/* Contact Info */}
          <div>
            <h3 className="font-semibold text-lg mb-6">Corporate Office</h3>
            <ul className="space-y-4">
              <li className="flex items-start gap-3">
                <MapPin className="h-5 w-5 text-secondary shrink-0 mt-0.5" />
                <span className="text-primary-foreground/80">
                  123 Learning Lane<br />
                  Suite 100<br />
                  Atlanta, GA 30309
                </span>
              </li>
              <li>
                <a href="tel:1-800-543-2995" className="flex items-center gap-3 text-primary-foreground/80 hover:text-secondary transition-colors">
                  <Phone className="h-5 w-5 text-secondary" />
                  1-800-KIDAZZLE
                </a>
              </li>
              <li>
                <a href="mailto:info@kidazzle.com" className="flex items-center gap-3 text-primary-foreground/80 hover:text-secondary transition-colors">
                  <Mail className="h-5 w-5 text-secondary" />
                  info@kidazzle.com
                </a>
              </li>
            </ul>
          </div>

          {/* Trust Badges */}
          <div>
            <h3 className="font-semibold text-lg mb-6">Quality Rated</h3>
            <div className="flex flex-col gap-4">
              <div className="flex items-center gap-3 bg-primary-dark/30 rounded-lg p-4">
                <Award className="h-10 w-10 text-secondary" />
                <div>
                  <p className="font-semibold">Quality Rated</p>
                  <p className="text-sm text-primary-foreground/70">3-Star Excellence</p>
                </div>
              </div>
              <div className="flex items-center gap-3 bg-primary-dark/30 rounded-lg p-4">
                <Award className="h-10 w-10 text-secondary" />
                <div>
                  <p className="font-semibold">NAEYC Accredited</p>
                  <p className="text-sm text-primary-foreground/70">National Recognition</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-primary-foreground/10">
        <div className="container-site py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-primary-foreground/60">
          <p>© {currentYear} KIDazzle Academy. All rights reserved.</p>
          <div className="flex gap-6">
            <a href="#privacy" className="hover:text-secondary transition-colors">Privacy Policy</a>
            <a href="#terms" className="hover:text-secondary transition-colors">Terms of Service</a>
            <a href="#accessibility" className="hover:text-secondary transition-colors">Accessibility</a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;